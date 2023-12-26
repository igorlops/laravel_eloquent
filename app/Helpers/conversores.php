<?php 

if(!function_exists('data_to_br')){
    function data_to_br(string $data)
    {
        return \Carbon\Carbon::create($data)->format('d/m/Y');
    }
}
if(!function_exists('data_to_iso')){
    function data_to_iso(string $data)
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y',$data)->toDateString();
    }
}