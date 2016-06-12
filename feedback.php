<!-- ////////////////////// feed back /////////////////// -->

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="">  </span>
								<input type="text" name="" value="<?= $idkhach ?>" placeholder="" class="hidden" id="idkhach">
								<input type="text" name="" value="<?= $idsanpham ?>" placeholder="" class="hidden" id="idsanpham">
				<div><input class="form-control" type="text" name="tieude" placeholder="Tiêu đề ..." id="tieudephanhoi"><p class="text-warning" id="errortieude"></p></div>
			</div>
			<div class="panel-body">
				<textarea id="noidungphanhoi" name="noidung" class="form-control" rows="3" placeholder="Nội dung phản hồi ..."></textarea>
				<p class="text-warning help-block" id="errornoidung"></p>
			</div>
			<div class="panel-footer text-right">
				<button type="reset" class="btn btn-default">Hủy</button>
		        <button onclick="submit_feedback()" class="btn btn-primary" name="feedback" value="done">Gửi phản hồi</button>
			</div>
			</div>
	</div>