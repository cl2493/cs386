const { Builder, By, Key, until } = require('selenium-webdriver');

async function example() {
  // Create a new instance of the WebDriver
  let driver = await new Builder().forBrowser('chrome').build();

  try {
    // Navigate to a webpage
    await driver.get('https://rnt-a-room-db33fe3ae403.herokuapp.com/index.php');

    // Find an element by CSS selector and click it
    await driver.findElement(By.css('.login-btn')).click();
    
    
    // Find an element by CSS selector and click it
    await driver.findElement(By.id('nurse-register')).click();


    // Wait for an element to be visible
    await driver.wait(until.elementLocated(By.css('.sign-up-title')), 5000);

    // Get the text of an element
    let resultText = await driver.findElement(By.css('.sign-up-title')).getText();
    console.log('Page Title: ', resultText);
  } finally {
    // Close the WebDriver session
    await driver.quit();
  }
}

example();
