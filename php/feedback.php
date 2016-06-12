<form onsubmit="return submit_feedback()" method="post" accept-charset="utf-8" name="feedback-form">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="">  </span>
				<div><input class="form-control" type="text" name="tieude" value="" placeholder="Title ..." id="tieudephanhoi"><p class="text-warning" id="errortieude"></p></div>
			</div>
			<div class="panel-body">
				<textarea id="noidungphanhoi" name="noidung" class="form-control" rows="3" placeholder="feedback ..."></textarea>
				<p class="text-warning help-block" id="errornoidung"></p>
			</div>
			<div class="panel-footer text-right">
				<button type="reset" class="btn btn-default">Reset</button>
		        <button type="submit" class="btn btn-primary" name="feedback" value="done">Send feedback</button>
			</div>
			</div>
	</div>
</form>
