<?php 
    $tabs = ["Students", "Universities", "Blacklisted"];
    $selectedTab = "Students";
?>

<div class="display-body">
    <div class="tabs">
        @foreach ($tabs as $tab)
        <div class="box" @if($tab===$selectedTab) style="background-color: lightblue;" @endif>
            <a href="#">{{ $tab }}</a>
        </div>
        @endforeach
    </div>
    <table class="table">
        @include('tables.tableHead')
    </table>
</div>