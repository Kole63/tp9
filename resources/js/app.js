import "./bootstrap";

import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// Bootstrap
import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

// party.js to put stars in your eyes
import * as party from "party-js";
window.party = party;

// Import of jQuery and DataTables
import jQuery from "jquery";
window.$ = jQuery;

// Import de DataTables
import DataTable from "datatables.net-bs5";
window.DataTable = DataTable;

// DataTables en français
import dtfrench from "./french.json";
window.dtfrench = dtfrench;
