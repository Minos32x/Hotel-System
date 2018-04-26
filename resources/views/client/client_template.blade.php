<style>.navbar-fixed-left {
width: 140px;
position: fixed;
border-radius: 0;
height: 100%;
}

.navbar-fixed-left .navbar-nav > li {
float: none;  /* Cancel default li float: left */
width: 139px;
}

.navbar-fixed-left + .container {
padding-left: 160px;
}

/* On using dropdown menu (To right shift popuped) */
.navbar-fixed-left .navbar-nav > li > .dropdown-menu {
margin-top: -50px;
margin-left: 140px;
}
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="navbar navbar-inverse navbar-fixed-left">
    <a class="navbar-brand" href="#">Brand</a>
    <ul class="nav navbar-nav">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Sub Menu1</a></li>
                <li><a href="#">Sub Menu2</a></li>
                <li><a href="#">Sub Menu3</a></li>
                <li class="divider"></li>
                <li><a href="#">Sub Menu4</a></li>
                <li><a href="#">Sub Menu5</a></li>
            </ul>
        </li>
        <li><a href="#">Link2</a></li>
        <li><a href="#">Link3</a></li>
        <li><a href="#">Link4</a></li>
        <li><a href="#">Link5</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <h2>Left side Navigation bar (Fixed)</h2>

        <p>Left side Navigation</p>
    </div>
</div>
