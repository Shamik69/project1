from selenium import webdriver

import time

driver = webdriver.Chrome(executable_path="C:/Users/User/PycharmProjects/comment_bot/executables/chromedriver.exe")

driver.get("http://localhost:81/project1/")
time.sleep(0.5)

driver.find_element_by_id('fname').send_keys('Shamik')

driver.find_element_by_id('lname').send_keys('Pal')

driver.find_element_by_id('age').send_keys('20')

def click(element):
    webdriver.ActionChains(driver).click(element).perform()

click(driver.find_element_by_id('male'))
click(driver.find_element_by_id('Submit'))

time.sleep(2)
driver.close()
quit()

