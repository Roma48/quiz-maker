
<?php $i = 1; ?>



<div id="questions-box">
    <?php

        foreach ($value as $question) :

    ?>
    <div id="question-<?php echo $i; ?>" class="question-box">
        <h3><?php echo $i; ?> вопрос</h3>
        <input type="text" class="question" name="question-<?php echo $i; ?>"    value=" <?php echo esc_attr($question); ?>">

        <div class="answer">
            <label for="question-<?php echo $i; ?>">A.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">B.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>" value="<?php echo esc_attr($value); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">C.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">D.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>" value=" <?php echo esc_attr($value); ?>">
        </div>
    </div>
    <?php $i++; endforeach; ?>
</div>



<button id="new-question">Добавить вопрос</button>



<script type="text/javascript">
    var i = <?php echo $i; ?>;
    jQuery("#new-question").click(function(e){

        e.preventDefault();
        jQuery('#questions-box').append(''+
            '<div id="question-' + i +'" class="question-box">' +
            '<h3>' + i + ' вопрос</h3>' +
            '<input type="text" class="question" name="question-'+ i + '" value="">'+

            '<div class="answer">' +
            '<label for="question-' + i +'">A.</label>' +
            '<input type="text" class="question" name="answer-<?php echo $i; ?>" value="">'+
            '</div>'+

            '<div class="answer">'+
            '<label for="question-' + i +'">B.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>" value="">'+
            '</div>' +

            '<div class="answer">'+
            '<label for="question-' + i +'">C.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>" value="">'+
            '</div>'+

            '<div class="answer">'+
           '<label for="question-' + i +'">D.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>" value="">'+
            '</div></div>'
        );
        i++;
    });
</script>