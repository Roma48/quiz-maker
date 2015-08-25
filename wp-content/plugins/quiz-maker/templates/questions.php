<style>
    input.question {
        width: 99.9%;
    }

    div.answer {
        width: 48%;
        float: left;
    }

    div.answer:nth-child(2n){
        float: right;
    }

    label {
        font-weight: bold;
    }

    #some_meta_box_name {
        overflow: hidden;
        padding-bottom: 20px;
    }

    #new-question {
        float: right;
    }

    .question-box {
        overflow: hidden;
        border: 1px solid #e5e5e5;
        padding: 10px;
        margin-bottom: 20px
    }

</style>
<?php $i = 1; ?>

<div id="question-<?php echo $i; ?>" class="question-box">
    <h3><?php echo $i; ?> вопрос</h3>
    <input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">

    <div class="answer">
        <label for="question-<?php echo $i; ?>"><?php echo $i; ?> ответ</label>
        <input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
    </div>

    <div class="answer">
        <label for="question-<?php echo $i; ?>"><?php echo $i; ?> ответ</label>
        <input type="text" class="question" name="question-<?php echo $i; ?>" value="<?php echo esc_attr($value); ?>">
    </div>

    <div class="answer">
        <label for="question-<?php echo $i; ?>"><?php echo $i; ?> ответ</label>
        <input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
    </div>

    <div class="answer">
        <label for="question-<?php echo $i; ?>"><?php echo $i; ?> ответ</label>
        <input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
    </div>

</div>

<button id="new-question">Добавить вопрос</button>



<script type="text/javascript">

    jQuery("#new-question").click(function(e){
        <?php $i++; ?>
        e.preventDefault();
        jQuery(this).parent().prepend('<div id="question-<?php echo $i; ?>" style="overflow: hidden; border: 1px solid #e5e5e5; padding: 10px; margin-bottom: 20px"><h3><?php echo $i; ?> вопрос</h3><input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>"></div>');
    });
</script>