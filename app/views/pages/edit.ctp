<?php
echo $this->Html->script('ckedit/ckeditor');
echo $this->Html->script('tab');
?>
<?php
$id = $page['Page']['id'];
$title = $page['Page']['title'];
$url = $page['Page']['url'];
$content = $page['Page']['content'];
$metaKeyword = $page['Page']['meta_keyword'];
$metaInformation = $page['Page']['meta_information'];
$content = $page['Page']['content'];
?>

<div id="category_main" class="box">
    <div id="category_header" class="heading">
        <h1>Edit Page</h1>
        <div class="buttons">
            <a onclick="PageEditForm.submit()">Save</a>
<?php echo $this->Html->link('Cancel', array('controller' => 'pages', 'action' => 'index')); ?>
        </div>
    </div>

    <div class="content">
        <?php echo $this->Form->create(null, array('name' => 'PageEditForm', 'url' => array('controller' => 'pages', 'action' => 'save'))); ?>
        <?php
        echo $this->Form->input('id', array('value' => $id, 'type' => 'hidden'));
        ?>
        <div class="htabs" id="tabs">
            <a tab="#tab_page" class="selected">Page</a>
            <a tab="#tab_description" class="">Meta Description</a>
        </div>
        <div id="tab_page">
            <table class=form >
                <tr>
                    <td>Title</td>
                    <td><?php echo $this->Form->input('title', array('label' => false, 'value' => $title)); ?></td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td><?php echo $this->Form->input('url', array('label' => false, 'value' => $url)); ?></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><?php echo $this->Form->input('content', array('id' => 'editor1', 'class' => 'editor', 'label' => false, 'value' => $content)); ?> </td></td>
                </tr>
            </table>
        </div>
        <div id="tab_description">
            <table class="form">
                <td>Meta Keywords</td>
                <td> <?php echo $this->Form->input('meta_keyword', array('label' => false, 'value' => $metaKeyword)); ?> </td>
                </tr>
                <tr>
                    <td>Meta Information</td>
                    <td> <?php echo $this->Form->input('meta_information', array('label' => false, 'value' => $metaInformation)); ?> </td>
                </tr>
            </table>
        </div>
        <script type="text/javascript"><!--
            $.tabs('#tabs a');
            //--></script>
<?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('editor1');
</script>