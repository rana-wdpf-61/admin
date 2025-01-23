<?php
echo Page::title(["title"=>"Show PortfolioData"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"portfoliodata", "text"=>"Manage PortfolioData"]);
echo Page::context_open();
echo PortfolioData::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
