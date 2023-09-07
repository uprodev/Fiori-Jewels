<?php
/**
* The template for displaying checkbox filters
*
* Override this template by copying it to yourtheme/woocommerce-ajax_filters/checkbox.php
*
* @author     BeRocket
* @package     WooCommerce-Filters/Templates
* @version  1.0.1
*/
extract($berocket_query_var_title);

global $shape;

foreach($terms as $term){break;}
//Get default template functionality
$template_content = BeRocket_AAPF_Template_Build_default();
//set unique id for filter
$filter_unique_class = ' bapf_'.$unique_filter_id;
$template_content['template']['attributes']['id']                                           = $filter_unique_class;
//set this template class
$template_content['template']['attributes']['class']['filter_type']                         = 'filter-item bapf_ckbox';
//Set data for filter links
$template_content['template']['attributes']['data-op']                                      = $operator;
$template_content['template']['attributes']['data-taxonomy']                                = ( berocket_isset($term, 'wpml_taxonomy') ? $term->wpml_taxonomy : $term->taxonomy );
//Set name for selected filters area and other siilar place
$template_content['template']['attributes']['data-name']                                    = $title;
//Set widget title
$template_content['template']['content']['header']['content']['title']['content']['title']  = $title;
//Add widget content
$template_content['template']['content']['filter']['content']['list']                       = array(
    'type'          => 'tag',
    'tag'           => 'ul',
    'attributes'    => array(),
    'content'       => array()
);

if ($template_content['template']['attributes']['data-taxonomy']  == 'pa_shape') {

}


$terms_content = array();
foreach( $terms as $i => $term ) {

    if ($term->taxonomy  == 'pa_shape') {
        $img = get_field('icon', $term);

        if ($img)
        $before = '<span>
            <img src="'.$img['url'].'">
            </span>';
    }

    $post_id = get_the_id();




    if (get_the_id() == 570 && $term->taxonomy == 'pa_shape')
        $term_name = '';
    else
        $term_name = $shape ? '' : $term->name;

    $element_unique = $filter_unique_class.'_'.$term->term_id;
    $terms_content['element_'.$i] = apply_filters('BeRocket_AAPF_template_single_item', array(
        'type'          => 'tag',
        'tag'           => 'li',
        'attributes'    => array(),
        'content'       => array(
            'checkbox'  => array(
                'type'          => 'tag_open',
                'tag'           => 'input',
                'attributes'    => array(
                    'data-name'     => $term->name,
                    'id'            => $element_unique,
                    'type'          => 'checkbox',
                    'value'         => $term->value
                ),
            ),
            'label'     => array(
                'type'          => 'tag',
                'tag'           => 'label',
                'attributes'    => array(
                    'for'           => $element_unique
                ),
                'content'       => array(
                    'name' => $before .$term_name
                )
            ),
        )
    ), $term, $i, $berocket_query_var_title);
}
$template_content['template']['content']['filter']['content']['list']['content'] = $terms_content;
$template_content = apply_filters('BeRocket_AAPF_template_full_content', $template_content, $terms, $berocket_query_var_title);
if( count($template_content['template']['content']['filter']['content']['list']['content']) > 0 ) {
    echo BeRocket_AAPF_Template_Build($template_content);

}
