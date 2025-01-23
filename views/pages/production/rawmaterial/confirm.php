<?php
echo Page::title(["title"=>"Show RawMaterial"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"rawmaterial", "text"=>"Manage RawMaterial"]);
echo Page::context_open();
echo Form::open(["route"=>"rawmaterial/delete/$id"]);
echo "Are you sure?";
echo RawMaterial::html_row_details($id);
echo Form::input(["name"=>"id", "type"=>"hidden", "value"=>$id]);
echo Form::input(["name"=>"delete", "class"=>"btn btn-danger", "value"=>"Delete", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
