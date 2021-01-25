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


def cleaning():
    df= pd.read_csv("example_dataset.csv")
    df= df[['First Name', 'Second Name', 'Age (in digits)', 'Gender', 'Level of Education', 'Are you looking for job?', 'Email']]
    df.columns= ['fname', 'lname', 'age', 'gender', 'edu', 'edu_status', 'mail']
    for i in ['age', 'gender', 'edu', 'edu_status']:
        print(f'{i}:{df[i].unique()}\n')

    df['gender']= df['gender'].map({'Female':'female', 'Male': 'male'})
    df['edu']= df['edu'].map({"Bachelor's degree":'Undergrduate',
                            'Pursuing masters degree': 'Postgraduate',
                            "Master's degree": 'Postgraduate', 
                            'Associate degree':'12th'})
    df['edu_status']= df['edu_status'].fillna('Studying')
    df['edu_status']= df['edu_status'].map({'No': 'Studying', 'Maybe': 'Studying', 'Yes': 'Have a job'})
    df.to_csv('dataset.csv', index= False)

df= pd.read_csv('dataset.csv')
