<script>
    $(document).ready(function(){
        var clearMePrevious = "";
        $('.searchInput').live('focus',function()
        {
            if($(this).val()==$(this).attr('title'))
            {
                clearMePrevious = $(this).val();
                $(this).val("");
            }
        });
        // if field is empty afterward, add text again
        $('.searchInput').live('blur',function()
        {
            if($(this).val()=="")
            {
                $(this).val($(this).attr('title'));
            }
        });
        $('.searchTitle').live('change',function(){
            var searchTitle = $('.searchTitle').val();
            $.post("<?php echo Router::url('/', true); ?>ajaxs/searchpage/title", {
                value:searchTitle
            },
            function(data){
                var div = '#category-content';
                $(div).html(data);
            });
        });
        $('.searchUrl').live('change',function(){
            var searchAuthor = $('.searchUrl').val();
            $.post("<?php echo Router::url('/', true); ?>ajaxs/searchpage/url", {
                value:searchAuthor
            },
            function(data){
                var div = '#category-content';
                $(div).html(data);
            });
        });
        //Code to group select
        var allCheck=false;
          $('#all-checked').live('change',function(){
              if($('#all-checked').is(":checked")){$('.checkMe').each(function(){$(this).attr('checked','checked')});}
              else{$('.checkMe').each(function(){$(this).removeAttr('checked')});}
              
          });
    });

</script>


<div class="box">
    <div class="heading">
        <h1>Pages</h1>
        <div class="buttons">
            <?php echo $this->Html->link('Add New', array('controller' => 'pages', 'action' => 'add')); ?>
        </div>
    </div>

    <div class="content" id="category-content">
        <?php echo $this->Form->create(null, array('name' => 'PageDisableForm', 'url' => array('controller' => 'pages', 'action' => 'disable')));?>
        <table class="list">
            <thead>
                <tr>
                    <td class="left">
                        <?php
                        echo $paginator->first(' « First  ', null, null, array('class' => 'disabled'));
                        echo $paginator->prev('  Previous  ', null, null, array('class' => 'disabled'));
                        //echo $paginator->counter();
                        echo $paginator->numbers();
                        echo $paginator->next('  Next  ', null, null, array('class' => 'disabled'));
                        echo $paginator->last('  Last » ', null, null, array('class' => 'disabled'));
                        ?>
                    </td>
                    <td class="center">
                        <input type="text" name="searchTitle" class="searchInput searchTitle" title="Search By Title" value="Search By Title" />
                    </td>
                    <td class="center">
                        <input type="text" name="searchAuthor" class="searchInput searchUrl" title="Search By URL" value="Search By Author" />
                    </td>
                    <td class="right">
                        Total Pages found:<?php echo $paginator->counter(array('format' => '%count%')); ?>
                    </td>
                    <td class="right">
                        <?php
                        echo $this->Form->select('action', array('active' => 'Enable', 'suspended' => 'Disable','deleted'=>'Delete'));
                        echo $this->Form->submit('Submit', array('div' => false, 'class' => 'submit'));
                        ?>
                    </td>
                </tr>
            </thead>
        </table>
        <table id="page-table"class="list">
            <thead>
                <tr>
                    <td class="left"><?php echo $this->Form->checkbox('All', array('value' => 'all-visible', 'hiddenField' => false,'id'=>'all-checked')); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('ID', 'id'); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('Title', 'title'); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('URL', 'url'); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('Status', 'status'); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('Date Created', 'created_date'); ?></td>
                    <td class="left"><?php echo $this->Paginator->sort('Date Updated', 'updated_date'); ?></td>
                    <td class="right">Edit</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($savedpages as $id => $value) {
                    $id = $value['Page']['id'];
                    ?>
                    <tr>
                        <td class="left"><?php echo $this->Form->checkbox($id, array('value' => $id,'name'=>'data[Page][id][]', 'hiddenField' => false,'class'=>'checkMe')); ?></td>
                        <td class="left"><?php echo $value['Page']['id']; ?></td>
                        <td class="left"><?php echo $value['Page']['title']; ?></td>
                        <td class="left"><?php echo $value['Page']['url']; ?></td>
                        <td class="left"><?php echo $value['Page']['status']; ?></td>
                        <td class="left"><?php echo $value['Page']['created_date']; ?></td>
                        <td class="left"><?php echo $value['Page']['updated_date']; ?></td>
                        <td class="right"><?php echo $this->Html->link('Edit ', array('controller' => 'pages', 'action' => 'edit', $id)); ?></td>
                    </tr>
                    <?php
                }
                ?>
        </table>
        
        <?php echo $this->Form->end();?>
    </div>
</div>






