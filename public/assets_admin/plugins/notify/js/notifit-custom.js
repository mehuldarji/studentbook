function not1() {
	notif({
		msg: "<b>Success:</b> Well done Details Submitted Successfully",
		type: "success"
	});
}

function not2() {
	notif({
		msg: "<b>Oops!</b> An Error Occurred",
		type: "error",
		position: "center"
	});
}

function not3() {
	notif({
		type: "warning",
		msg: "<b>Warning:</b> Something Went Wrong",
		position: "left"
	});
}

function not4() {
	notif({
		type: "info",
		msg: "<b>Info: </b>Some info here.",
		width: "all",
		height: 100,
		position: "center"
	});
}

function not5() {
	notif({
		type: "error",
		msg: "<b>Error: </b>This error will stay here until you click it.",
		position: "center",
		width: 500,
		height: 60,
		autohide: false
	});
}

function not6() {
	notif({
		type: "warning",
		msg: "Opacity is cool!",
		position: "center",
		opacity: 0.8
	});
}