<?php
if(DB::connection()->getDatabaseName())
{
   echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
}
?>