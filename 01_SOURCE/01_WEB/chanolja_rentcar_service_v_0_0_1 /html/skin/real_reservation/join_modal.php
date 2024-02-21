<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pensionConf.php";
?>
<form>
      <div class="form-group">
      <label for="recipient-name" class="col-form-label">성함:</label>
      <input type="text" class="form-control" id="question_name">
      </div>
      <label for="recipient-name" class="col-form-label">연락처:</label>
      <input type="text" class="form-control" id="question_phone">
      </div>
      <div class="form-group">
      <label for="message-text" class="col-form-label">문의내용:</label>
      <textarea class="form-control" id="question_content"></textarea>
      </div>
</form>
