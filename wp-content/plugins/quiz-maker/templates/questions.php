
<?php $i = 1; ?>



<div id="questions-box">
    <?php
        $value = get_post_meta(get_the_ID(), '_my_meta_value_key', true);
        if (isset($_GET['del'])){
            unset($value[$_GET['del']]);
            update_post_meta( get_the_ID(), '_my_meta_value_key', $value);
        }

        foreach ($value as $question) :
            $key = array_search($question['question'], $value);

    ?>
    <div id="question-<?php echo $i; ?>" class="question-box">
        <a href="/wp-admin/post.php?post=<?php echo get_the_ID(); ?>&action=edit&del=<?php echo $key; ?>" style="float: right">Удалить</a>
        <h3><?php echo $i; ?> вопрос</h3>

        <input type="text" class="question" name="question-<?php echo $i; ?>" value=" <?php echo esc_attr($question['question']); ?>">

                <div class="answer">
                    <label for="question-<?php echo $i; ?>">A.</label>
                    <input type="text" class="question" name="answer-<?php echo $i; ?>-1" value="<?php echo esc_attr($question['answers'][1]); ?>">
                </div>


        <div class="answer">
            <label for="question-<?php echo $i; ?>">B.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>-2" value="<?php echo esc_attr($question['answers'][2]); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">C.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>-3" value="<?php echo esc_attr($question['answers'][3]); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">D.</label>
            <input type="text" class="question" name="answer-<?php echo $i; ?>-4" value="<?php echo esc_attr($question['answers'][4]); ?>">
        </div>

        <div class="answer">
            <label for="question-<?php echo $i; ?>">Верный ответ</label>
            <div class="answers-list">
                <label>A.</label>
                <input type="radio" class="answer-right" <?php if($question['answer-right'] == 1) echo "checked" ?> name="answer-right-<?php echo $i; ?>" value="1">
                <label>B.</label>
                <input type="radio" class="answer-right" <?php if($question['answer-right'] == 2) echo "checked" ?> name="answer-right-<?php echo $i; ?>" value="2">
                <label>C.</label>
                <input type="radio" class="answer-right" <?php if($question['answer-right'] == 3) echo "checked" ?> name="answer-right-<?php echo $i; ?>" value="3">
                <label>D.</label>
                <input type="radio" class="answer-right" <?php if($question['answer-right'] == 4) echo "checked" ?> name="answer-right-<?php echo $i; ?>" value="4">
            </div>

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
            '<input type="text" class="question" name="answer-<?php echo $i; ?>-1" value="">'+
            '</div>'+

            '<div class="answer">'+
            '<label for="question-' + i +'">B.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>-2" value="">'+
            '</div>' +

            '<div class="answer">'+
            '<label for="question-' + i +'">C.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>-3" value="">'+
            '</div>'+

            '<div class="answer">'+
           '<label for="question-' + i +'">D.</label>'+
            '<input type="text" class="question" name="answer-<?php echo $i; ?>-4" value="">'+
            '</div>' +

            '<div class="answer">' +
            '<label for="question-<?php echo $i; ?>">Верный ответ</label>' +
            '<div class="answers-list">' +
            '<label>A.</label>' +
            '<input type="radio" class="answer-right" name="answer-right-<?php echo $i; ?>" value="1">' +
            '<label>B.</label>' +
            '<input type="radio" class="answer-right" name="answer-right-<?php echo $i; ?>" value="2">' +
            '<label>C.</label>' +
            '<input type="radio" class="answer-right" name="answer-right-<?php echo $i; ?>" value="3">' +
            '<label>D.</label>' +
            '<input type="radio" class="answer-right" name="answer-right-<?php echo $i; ?>" value="4">' +
            '</div>' +
            '</div></div>'
        );
        i++;
    });
</script>