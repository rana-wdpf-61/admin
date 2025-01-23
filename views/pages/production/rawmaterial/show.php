<?php
echo Page::title(["title"=>"Show RawMaterial"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"rawmaterial", "text"=>"Manage RawMaterial"]);
echo Page::context_open();
echo RawMaterial::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
