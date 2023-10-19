<?php 
    $tabs = ["Students", "Universities", "Blacklisted"];
    $selectedTab = "Students";
?>

<style>
    .display-body {
        margin: 2rem auto;
        background-color: #f6f6f6;
        padding: 20px;
        border-radius: 10px;
        width: 98%;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.19), 0 3px 3px rgba(0, 0, 0, 0.23);
        cursor: pointer;
    }

    .tabs {
        display: flex;
        justify-content: space-around;
        width: 100%;
    }

    .box {
        width: 100%;
        text-align: center;
        background-color: #f6f6f6;
        padding: 10px;
        margin: 0;
        border: 1px solid #ccc;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tabs = document.querySelectorAll('.box');
        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (t) {
                    t.style.backgroundColor = '#f6f6f6';
                });
                tab.style.backgroundColor = 'lightblue';
            });
        });
    });
</script>

<div class="display-body">
    <div class="tabs">
        @foreach ($tabs as $tab)
        <div class="box" @if($tab===$selectedTab) style="background-color: lightblue;" @endif>
            <a href="#">{{ $tab }}</a>
        </div>
        @endforeach
    </div>
</div>