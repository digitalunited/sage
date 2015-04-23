<?php
/**
 * This component requires wp_posts table to be set as MyISAM
 * due to usage of boolean full text search
 */
namespace Component;

class SearchResult extends \DigitalUnited\Components\Component
{
    private $searchTermMinLength = 3;

    protected function getDefaultParams()
    {
        return ['s' => ''];
    }

    public function getErrorMessage()
    {
        if (strlen($this->param('s')) < $this->searchTermMinLength) {
            return __('sarch.result.term.to.short', 'components');
        } else {
            return __('sarch.result.no.hits.message', 'components');
        }
    }

    public function getSearchResults()
    {
        return array_map(function($row) {
            return new Post([
                'post' => $row,
            ]);
        }, $this->getFullTextSearchResults());
    }

    public function getFullTextSearchResults()
    {
        global $wpdb;
        $queries = [];
        foreach ([1 => 'post_content', 2 => 'post_title'] as $score => $column) {
            $queries[] = $wpdb->prepare("(select *, {$score} as score
                from $wpdb->posts
                where match({$column}) against (%s IN BOOLEAN MODE)
                and post_type in (".$this->getSearchablePostTypesInQuery().")
                and post_status = 'publish')", $this->getBooleanSearchQuery());
        }

        $mainQuery = "select *, sum(score) as total_score
            from ( ".implode(' union ', $queries).") as maintbl
            group by ID order by total_score desc limit 20";

        return $wpdb->get_results($mainQuery);
    }

    private function getSearchablePostTypesInQuery()
    {
        $postTypes = get_post_types([
            'public' => true,
            'exclude_from_search' => false,
        ]);

        // Add quotes to the name since it will be passed as a
        // string to mysql.
        $postTypes = array_map(function($postTypeName) {
            return "'$postTypeName'";
        }, $postTypes);

        return implode(', ', $postTypes);
    }

    private function getBooleanSearchQuery()
    {
        $keywords = explode(' ', $this->param('s'));

        return array_reduce($keywords, function($stack, $keyword) {

            /**
             * Short keywords should not be required in the query, but
             * they should rather rank higher if they match as well
             *
             * Wildcart modifier is also removed to prevent long and
             * irelevant result lists
             *
             * @link http://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
             */
            if (strlen($keyword) > 2) {
                $keyword = "+$keyword*";
            }

            return $stack.' '.$keyword;
        });
    }

    public function main()
    {
        add_action('init', array(&$this, 'excludePostTypesFromSearch'));
    }

    public function excludePostTypesFromSearch()
    {
        global $wp_post_types;
        $wp_post_types['attachment']->exclude_from_search = true;
    }
}
