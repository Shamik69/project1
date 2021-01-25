from selenium import webdriver
from selenium.webdriver.support.ui import Select

import pandas as pd

import time


print('lol')

def testing(fname, lname, age, gender, edu, edu_status, mail):
    driver = webdriver.Chrome(executable_path="C:/Users/User/PycharmProjects/comment_bot/executables/chromedriver.exe")
    
    driver.get("http://localhost:81/project1/")
    time.sleep(0.5)

    driver.find_element_by_id('fname').send_keys(fname)

    driver.find_element_by_id('lname').send_keys(lname)

    driver.find_element_by_id('age').send_keys(age)

    select = Select(driver.find_element_by_id('edu'))

    # select by visible text
    select.select_by_visible_text(edu)

    def click(element):
        time.sleep(0.5)
        webdriver.ActionChains(driver).click(element).perform()
        time.sleep(0.5)


    driver.find_element_by_id('mail').send_keys(mail)

    click(driver.find_element_by_id(gender))
    click(driver.find_element_by_id('Submit'))

    time.sleep(5)
    driver.close()
    quit()


