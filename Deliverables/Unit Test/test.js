// Importing required modules
const { JSDOM } = require("jsdom");

// Load the JavaScript file containing the code to be tested
const code = require("./testScript.js");

// Test Suite
describe("Certification upload section hiding", () => {
    let dom, window;
  
    beforeEach(() => {
      // Create a DOM environment
      dom = new JSDOM(`
        <html>
          <body>
            <div id="certification">
              <form id="certForm">
                <input type="submit">
              </form>
            </div>
          </body>
        </html>
      `);
      window = dom.window;
    });
  
    test("hides certification upload section after form submission", () => {
      // Execute the JavaScript code
      window.dispatchEvent(new window.Event("DOMContentLoaded"));
  
      // Trigger form submission event
      window.document.getElementById("certForm").dispatchEvent(new window.Event("submit"));
  
      // Check if certification section is hidden
      const certificationContainer = window.document.getElementById("certification");
      expect(certificationContainer.style.display).toBe("none"); // Assuming the section is hidden by setting its style.display to "none"
    });
});
