<?php

function grid_presets($controller){

    $options = array(
        'is_sortable' => false,
        'is_filter' => false,
        'is_pagination' => false,
        'is_draggable' => false,
        'show_id' => false
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30,
        ),
        'title' => array(
            'title' => LANG_IMAGES_PRESET,
            'href' => href_to($controller->root_url, 'presets_edit', array('{id}')),
        ),
        'name' => array(
            'title' => LANG_SYSTEM_NAME,
        ),
        'width' => array(
            'title' => LANG_IMAGES_PRESET_SIZE,
			'handler' => function($val, $row){
				return $val . ' x ' . $row['height'];
			}
        ),
        'is_square' => array(
            'title' => LANG_IMAGES_PRESET_SQUARE,
			'flag' => true,
			'flag_toggle' => href_to($controller->root_url, 'presets_toggle', array('{id}')),
            'width' => 80,
        ),
        'is_watermark' => array(
            'title' => LANG_IMAGES_PRESET_WM,
			'flag' => true,
			'flag_toggle' => href_to($controller->root_url, 'presets_wm_toggle', array('{id}')),
            'width' => 100,
        ),
    );

    $actions = array(
        array(
            'title' => LANG_EDIT,
            'class' => 'edit',
            'href' => href_to($controller->root_url, 'presets_edit', array('{id}')),
        ),
        array(
            'title' => LANG_DELETE,
            'class' => 'delete',
            'href' => href_to($controller->root_url, 'presets_delete', array('{id}')),
            'confirm' => LANG_IMAGES_PRESET_DELETE_CONFIRM,
			'handler' => function($row){
				if($row['is_internal']){ return false; }
				return true;
			}
        )
    );

    return array(
        'options' => $options,
        'columns' => $columns,
        'actions' => $actions
    );

}

