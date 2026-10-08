// fixture do autoteste de scripts/testes.sh: suite JS verde com 2 casos.
"use strict";
const test = require("node:test");
const assert = require("node:assert/strict");
test("soma", () => { assert.equal(1 + 1, 2); });
test("subtracao", () => { assert.equal(3 - 1, 2); });
