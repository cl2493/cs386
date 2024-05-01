// Import jsdom to simulate the DOM environment
const { JSDOM } = require('jsdom');

// Mock the alert function
global.alert = jest.fn();

const { showMessageFunction } = require('./message.js');

// Test suite for showMessageFunction
describe('showMessageFunction', () => {
    it('should call the alert function', () => {
        // Call the function
        showMessageFunction();

        // Check if the alert function was called
        expect(global.alert).toHaveBeenCalled();
    });
});
