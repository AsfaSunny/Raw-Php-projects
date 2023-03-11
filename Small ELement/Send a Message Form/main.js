//js

const m_form = document.querySelector("form");
statusTxt = m_form.querySelector(".button-area span");

m_form.onsubmit = (e) => {
	e.preventDefault();
	statusTxt.style.color = "#0d6efd";
	statusTxt.style.display = "block";

	//ajax
	let xhtr = new XMLHttpRequest();
	xhtr.open("POST", "message.php", true);
	xhtr.onload = () => {
		if (xhtr.readyState == 4 && xhtr.status == 200) { //readystate = 4 and status = 200 means no error
			let Ajax_response = xhtr.response;
			if (Ajax_response.indexOf("Your Email and A Message must be required!")!= -1 || Ajax_response.indexOf("Enter a valid Email")!= -1 || Ajax_response.indexOf("Sorry, Failed to send your message")!= -1) {
				statusTxt.style.color = "crimson";
			} else {
				m_form.reset();
				setTimeout(() => {
					statusTxt.style.display = "none";
				}, 3000);
			}
			statusTxt.innerText = Ajax_response;
		}
	}
	let Form_Data = new FormData(m_form);
	xhtr.send(Form_Data);
}