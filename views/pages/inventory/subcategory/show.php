<?php
echo Page::title(["title"=>"Show SubCategory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"subcategory", "text"=>"Manage SubCategory"]);
echo Page::context_open();
echo SubCategory::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
