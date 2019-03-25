$(document).ready(function() {
	let qid = $(".q").attr("id");
	// console.log(qid);

	let answerIndex = $("input[name='answer']:checked").val();
	// console.log(answerIndex);
	let nextQ;
	$.ajax({
		type: "GET",
		url:
			"/SurveyManagement/cakephp/questions/getNextQuestion/" +
			qid +
			"/" +
			answerIndex,
		// data: {id: qid},
		success: function(response) {
			// alert(response);
			nextQ = response;
		}
	});
});
