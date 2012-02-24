<?php echo $this->Html->script("jquery.jstree");?>
<?php echo $this->Html->css('jstree');?>
<div id="menu-tree">
    <ul>
        <li><a href="#">Admin</a></li>
        <li><a href="#">Assassin</a>
            <ul>
            <li><a href="#">Azeroth</a></li>
            <li><a href="#">47</a></li>
            <li><a href="#">Kratos</a></li>
            </ul>
        </li>
        <li><a href="#">Superman</a></li>
        <li><a href="#">User</a></li>
    </ul>
</div>
<script type="text/javascript">
    $("#demo1").jstree();//.bind("loaded.jstree", function (event, data) {});
    setTimeout(function(){$("#menu-tree").jstree("set_focus");}, 500);

</script>