

const id = [
    {
        input: "inputpassword",
        id: 'mata'
    },
    {
        input: "inputpassword-re",
        id: 'mata-re'
    },
]

id.map((data) => {
    const inputPassword = document.getElementById(data.input);
    const mata = document.getElementById(data.id)

    mata.addEventListener("click", function() {
        let type = inputPassword.getAttribute("type");
        if(type === "password") {
            inputPassword.setAttribute("type", "text");
            mata.setAttribute("src","https://cdn-icons-png.flaticon.com/128/10812/10812267.png")
        } else {
            inputPassword.setAttribute("type", "password");
            mata.setAttribute("src","https://cdn-icons-png.flaticon.com/128/159/159604.png")
        }
    });
})