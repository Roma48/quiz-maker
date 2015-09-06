<?php
/*
Plugin Name: QuizMaker
Plugin URI: /
Description: QuizMaker post type
Version: 0.1
Author: Roma Paliy
Author URI: /
License: GPLv2 or later
Text Domain: /
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if (!class_exists("QuizMaker")){

    class QuizMaker {

        protected $name;

        function __construct(){
            add_action( 'init', array($this, 'create_posttype'));
            add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
            add_action( 'save_post', array( $this, 'save' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
        }

        function create_posttype()
        {
            register_post_type('tests', array(
                    'labels' => array(
                        'name' => __('Тесты'),
                        'singular_name' => __('Тест')
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'tests'),
                    'supports'   => array( 'title', 'editor', 'thumbnail' )
                )
            );
        }

        /**
         * Adds the meta box container.
         */
        public function add_meta_box( $post_type ) {
            $post_types = array('tests');     //limit meta box to certain post types
            if ( in_array( $post_type , $post_types )) {
                add_meta_box(
                    'some_meta_box_name'
                    ,'Вопросы'
                    ,array( $this, 'render_meta_box_content' )
                    ,$post_type
                    ,'advanced'
                    ,'high'
                );
            }
        }

        /**
         * Save the meta when the post is saved.
         *
         * @param int $post_id The ID of the post being saved.
         */

        public function save( $post_id ) {

            /*
             * We need to verify this came from the our screen and with proper authorization,
             * because save_post can be triggered at other times.
             */

            // Check if our nonce is set.
            if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) )
                return $post_id;

            $nonce = $_POST['myplugin_inner_custom_box_nonce'];

            // Verify that the nonce is valid.
            if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) )
                return $post_id;

            // If this is an autosave, our form has not been submitted,
            //     so we don't want to do anything.
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return $post_id;

            // Check the user's permissions.
            if ( 'page' == $_POST['post_type'] ) {

                if ( ! current_user_can( 'edit_page', $post_id ) )
                    return $post_id;

            } else {

                if ( ! current_user_can( 'edit_post', $post_id ) )
                    return $post_id;
            }

            /* OK, its safe for us to save the data now. */

            // Sanitize the user input.
            $i = 0;
            $j = 1;
            $mydata = array();
            while ($i == 0) {
                if (isset($_POST['question-'.$j])){

                    $mydata[$j] = $_POST['question-'.$j];
                    $j++;
                } else {
                    $i = 1;
                }
            }

            // Update the meta field.
            update_post_meta( $post_id, '_my_meta_value_key', $mydata );
        }


        /**
         * Render Meta Box content.
         *
         * @param WP_Post $post The post object.
         */
        public function render_meta_box_content( $post ) {

            // Add an nonce field so we can check for it later.
            wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

            // Use get_post_meta to retrieve an existing value from the database.
            $value = get_post_meta( $post->ID, '_my_meta_value_key', true );

            include_once('templates/questions.php');
        }

        public function register_plugin_styles() {
            wp_register_style( 'quiz-admin-style', plugins_url( 'quiz-maker/css/style.css' ) );
            wp_enqueue_style( 'quiz-admin-style' );
        }

    }

    $create_post_type = new QuizMaker();

}