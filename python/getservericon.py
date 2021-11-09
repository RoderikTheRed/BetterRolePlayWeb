from selenium import webdriver
from selenium.webdriver.chrome.options import Options

DRIVER_PATH = "chromedriver.exe"

options = Options()
options.headless = True
options.add_argument("--windows-size=1920,1080")

driver = webdriver.Chrome(options=options, executable_path=DRIVER_PATH)
driver.get('https://discord.gg/darkviperau')
print(driver.page_source)
driver.quit()