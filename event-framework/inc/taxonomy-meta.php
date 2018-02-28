<?php

new RW_Taxonomy_Meta(
    array(
        'id' => 'session-track-metas',
        'taxonomies' => array('session-track'),
        'title' => '',
        'fields' =>
            array(
                array(
                    'name' => __('Color', 'dxef'),
                    'id' => 'session_track_color',
                    'type' => 'color'
                )
            )
    )
);

new RW_Taxonomy_Meta(
    array(
        'id' => 'sponsor-tier-metas',
        'taxonomies' => array('sponsor-tier'),
        'title' => '',
        'fields' =>
            array(
                array(
                    'name' => __('Order', 'dxef'),
                    'id' => 'sponsor_tier_order',
                    'type' => 'text'
                )
            )
    )
);