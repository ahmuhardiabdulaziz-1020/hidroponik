<!DOCTYPE html>
<html>

<head>

<title>
@yield('title')
</title>


<style>

body{

margin:0;
font-family:Arial;
background:#f5f7f8;

}


.topbar{
    height:60px;
    background:#065f46;
    color:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 25px;
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:1000;
}


.sidebar {
    height: calc(100vh - 60px);
    width:240px;
    background:#064e3b;
    color:white;
    position:fixed;
    top:60px;
    left:0;
    overflow-y:auto;
    overflow-x:hidden;
    box-sizing:border-box;
    z-index:900;
}


.content{
    margin-left:240px;
    padding:100px 30px 30px 30px;
    width:calc(100% - 240px);
    box-sizing:border-box;
    position:relative;
    z-index:1;
}


.menu{
padding:15px 20px;
display:block;
color:white;
text-decoration:none;
}


.menu:hover{

background:#047857;

}

</style>

</head>


<body>


<x-topbar />



<x-sidebar />



<div class="content">

@yield('content')

</div>


</body>

</html>