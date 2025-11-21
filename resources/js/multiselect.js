const multiselect = {
    name: "",
    init: function (name) {
        multiselect.name = name;
        let lst = document.getElementById("select_" + multiselect.name);
        lst.addEventListener("change", multiselect.select);
    },
    createSpan: function (id, item) {
        let list = document.getElementById(multiselect.name + "List");

        let input = document.createElement("input");
        input.type = "hidden";
        input.value = id;
        input.name = multiselect.name + "[" + id + "]";

        let spanItem = document.createElement("span");
        spanItem.classList.add("align-middle", "pe-2");
        spanItem.innerHTML = item;

        let button = document.createElement("button");
        button.type = "button";
        button.classList.add("btn-close");
        button.addEventListener("click", () => multiselect.remove(id));

        let spanButton = document.createElement("span");
        spanButton.classList.add("align-top");
        spanButton.append(button);

        let spanConteneur = document.createElement("span");
        spanConteneur.classList.add("badge", "bg-primary", "m-1");
        spanConteneur.append(input);
        spanConteneur.append(spanItem);
        spanConteneur.append(spanButton);
        spanConteneur.id = multiselect.name + "_" + id;

        list.append(spanConteneur);
    },
    select: function () {
        let lst = document.getElementById("select_" + multiselect.name);
        let id = lst.options[lst.selectedIndex].value;
        let item = lst.options[lst.selectedIndex].text;
        lst.options[lst.selectedIndex].style.display = "none";
        lst.value = -1;
        multiselect.createSpan(id, item);
    },
    remove: function (id) {
        document.querySelector(
            "#select_" + multiselect.name + " option[value='" + id + "']"
        ).style.display = "block";
        document.getElementById(multiselect.name + "_" + id).remove();
    },
    add: function (id) {
        let option = document.querySelector(
            "#select_" + multiselect.name + " option[value='" + id + "']"
        );
        option.style.display = "none";
        multiselect.createSpan(id, option.text);
    },
};

window.multiselect = multiselect;
