"use strict";

var editor = ace.edit("editor");
// Sublime appearance:
editor.setTheme("ace/theme/monokai");

// You may choose from many many language syntaxes or let syntax default
editor.getSession().setMode("ace/mode/javascript");

// More editor properties can be set here ...
