<?php
/*
	Copyright 2013  webophonic  (email : webophonic@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software

*/

/* Interface des customs Types */
interface IWebophonicType
{
	public function register_type();
	public function unregister_type();
	public function name();
	public function arguments();
}

interface IWithTaxonomies 
{   
    public function taxnonomies();
}

interface IWithFields 
{   
   public function register_fields();
   public function save_custom_post($post_id);    
}

abstract class WebophonicType implements IWebophonicType{


    public function __construct() {
        add_action('init',array($this,'register_type'));
        if (is_a($this, IWithFields)) {
            add_action('add_meta_boxes',array($this,'register_fields'));
            add_action('save_post',array($this,'save_custom_post'));     
        }
    }

    public function register_type(){
        $name = $this->name();
        $arguments = $this->arguments();
        $arguments['capability'] = $name;
        register_post_type($name,$arguments);

        if (is_a($this, IWithTaxonomies)) {
            foreach ($this->taxnonomies() as $taxonomy => $attributes) {
                if (taxonomy_exists( $taxonomy )) {
                 register_taxonomy_for_object_type( $taxonomy,$name);
                } else {   
                 register_taxonomy( $taxonomy, array($name), $attributes);    
                }
            }
        }
    }
    
    public function unregister_type(){
        remove_action('init',array($this,'unregister_type'));
    }
}
?>