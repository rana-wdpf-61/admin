<?php
echo Page::title(["title"=>"Show Build"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"build", "text"=>"Manage Build"]);
echo Page::context_open();
echo Build::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
?>
