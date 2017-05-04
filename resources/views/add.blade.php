@extends('layouts.master')

 <div class="container-fluid">
    <div id='content'>

        <form method='POST' action='/movies/add'>
            {{ csrf_field() }}

            <input type='hidden' name='id' value=''>

            <label for='type'>* List Type</label>
            <select id='list_type' name='list_type'>
           
            </select>

            <label for='published'>* List Title</label>
            <input type='text' name='title' id='title' value=''><br>
        
            <input class='btn btn-primary' type='submit' value='ADD MOVIE'>

        </form>
    </div>
</div>