// fixture do autoteste: um caso verde e um que falha.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
test("passa", () => { assert.equal(1, 1); });
test("falha", () => { assert.equal(1, 2); });
