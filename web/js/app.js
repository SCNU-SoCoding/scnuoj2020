var OJ_VERDICT = new Array(
    "Pending",
    "Pending Rejudge",
    "Compiling",
    "Running & Judging",
    "Accepted",
    "Presentation Error",
    "Wrong Answer",
    "Time Limit Exceeded",
    "Memory Limit Exceeded",
    "Output Limit Exceeded",
    "Runtime Error",
    "Compile Error",
    "System Error",
    "No Test Data"
);
function testHtml(id, caseJsonObject)
{
  return '<div class="panel panel-default test-for-popup"> \
        <div class="panel-heading" role="tab" id="heading' + id + '"> \
            <h4 class="panel-title"> \
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" \
                   href="#test-' + id + '" aria-expanded="false" aria-controls="test-' + id + '"> \
                    #<span class="test" style="width: 50px">' + id + '</span>， \
                    <span class="verdict">' + OJ_VERDICT[caseJsonObject.verdict] + '</span>， \
                    用时: <span class="time">' + caseJsonObject.time + '</span> ms， \
                    内存: <span class="memory">' + caseJsonObject.memory + '</span> KB \
                </a> \
            </h4> \
        </div> \
        <div id="test-' + id + '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' + id + '"> \
            <div class="panel-body">\
                <div class="sample-test">\
                    <div class="input">\
                        <h4>输入</h4>\
                        <pre>' + caseJsonObject.input + '</pre>\
                    </div>\
                    <div class="output">\
                        <h4>输出</h4>\
                        <pre>' + caseJsonObject.user_output + '</pre>\
                    </div>\
                    <div class="output">\
                        <h4>答案</h4>\
                        <pre>' + caseJsonObject.output + '</pre>\
                    </div>' + (caseJsonObject.checker_log == "" ? "" :  '<div class="output"><h4>检查日志</h4><pre>' + caseJsonObject.checker_log + '</pre></div>')
      + '<div class="output">\
                        <h4>系统信息</h4>\
                        <pre>exit code: ' + caseJsonObject.exit_code + ', checker exit code: ' + caseJsonObject.checker_exit_code + '</pre>\
                    </div>\
                </div>\
            </div>\
        </div>\
    </div>';
}
function subtaskHtml(id, score)
{
  return '<div class="panel panel-default test-for-popup"> \
        <div class="panel-heading" role="tab" id="subtask-heading-' + id + '"> \
            <h4 class="panel-title"> \
                <a role="button" data-toggle="collapse" data-parent="#accordion" \
                    href="#subtask-' + id + '" aria-expanded="false" aria-controls="subtask-' + id + '"> \
                    子任务 #' + id + ', score: ' + score + ' \
                </a> \
            </h4> \
        </div> \
        <div id="subtask-' + id + '" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subtask-heading-' + id + '"> \
            <div id="subtask-body-' + id + '" class="panel-body"> \
            </div> \
        </div> \
    </div>';
}
$(document).ready(function () {

$(".sample-test h4").each(function() {
  var preId = ("id" + Math.random()).replace('.', '0');
  var cpyId = ("id" + Math.random()).replace('.', '0');

  $(this).parent().find("pre").attr("id", preId);
  var copy = $("<div title='Copy' data-clipboard-target='#" + preId + "' id='" + cpyId + "' class='btn-copy'>复制</div>");
  $(this).append(copy);

  var clipboard = new ClipboardJS('#' + cpyId, {
    text: function(trigger) {
      return document.querySelector('#' + preId).innerText;
    }
  });
  clipboard.on('success', function(e) {
    $('#' + cpyId).text("已复制");
    setTimeout(function() {
      $('#' + cpyId).text('复制');
    }, 500);
    e.clearSelection();
  });
  clipboard.on('error', function(e) {
    $('#' + cpyId).text("复制失败");
    setTimeout(function() {
      $('#' + cpyId).text('复制');
    }, 500);
  });
});


//do something
})
