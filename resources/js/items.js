const items = {
    display: function (URL) {
        const myModal = new bootstrap.Modal(document.getElementById("myModal"));
        fetch(URL, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (response.ok) {
                    response.json().then((json) => {
                        document.getElementById("myModal_body").innerHTML =
                            json["content"];
                        document.getElementById("myModal_title").innerHTML =
                            json["title"];
                    });
                    myModal.show();
                } else console.error(response.status);
            })
            .catch((error) => console.error(error));
    },
    delete: function (URL) {
        document.querySelector("#deleteForm").action = URL;
        const myModal = new bootstrap.Modal(
            document.getElementById("deleteModal")
        );
        myModal.show();
    },
    loading: false,
    currentUrl: "",
    initScroll: function (URL) {
        items.currentUrl = URL;
        window.addEventListener("scroll", items.scroll);
    },
    scroll: function () {
        if (
            document.documentElement.scrollTop +
                window.innerHeight +
                window.innerHeight / 2 >
            document.documentElement.scrollHeight
        ) {
            if (!items.loading) {
                items.loading = true;
                console.log(
                    document.querySelectorAll("#items_content > div").length
                );
                fetch(items.currentUrl, {
                    method: "POST",
                    body:
                        "offset=" +
                        document.querySelectorAll("#items_content > div")
                            .length,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "Content-Type": "application/x-www-form-urlencoded",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                })
                    .then((response) => {
                        if (response.ok) {
                            response.text().then((text) => {
                                if (text != "") {
                                    document.getElementById(
                                        "items_content"
                                    ).innerHTML += text;
                                    items.loading = false;
                                }
                            });
                        } else {
                            console.error(response.status);
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }
        }
    },
};

window.items = items;
