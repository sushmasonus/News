<?php
/**
*
*/

include 'BaseModel.php';

class NewsModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public $tablename = "news";

}
