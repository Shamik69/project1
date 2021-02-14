from selenium import webdriver
from selenium.webdriver.support.ui import Select
import string
import pandas as pd
from numpy import random
import time


print('lol')

driver = webdriver.Chrome(
    executable_path="C:/Users/User/PycharmProjects/comment_bot/executables/chromedriver.exe")


def click(element):
    time.sleep(0.5)
    webdriver.ActionChains(driver).click(element).perform()
    time.sleep(0.5)


def testing(fname, lname, age, gender, edu, edu_status, mail):
    driver.get("http://localhost:81/project1/")

    driver.find_element_by_id('fname').send_keys(fname)

    driver.find_element_by_id('lname').send_keys(lname)

    driver.find_element_by_id('age').send_keys(age)

    click(driver.find_element_by_id(gender))

    select = Select(driver.find_element_by_id('edu'))

    # select by visible text
    select.select_by_visible_text(edu)

    if edu_status == 'Studying':
        click(driver.find_element_by_id('chk0'))
    elif edu_status == 'Have a job':
        click(driver.find_element_by_id('chk1'))

    driver.find_element_by_id('mail').send_keys(mail)

    click(driver.find_element_by_id('Submit'))
    click(driver.find_element_by_id('Confirm'))


def cleaning():
    df = pd.read_csv("example_dataset.csv")
    df = df[['First Name', 'Second Name',
             'Age (in digits)', 'Gender', 'Level of Education', 'Are you looking for job?', 'Email']]
    df.columns = ['fname', 'lname', 'age',
                  'gender', 'edu', 'edu_status', 'mail']
    for i in ['age', 'gender', 'edu', 'edu_status']:
        print(f'{i}:{df[i].unique()}\n')

    df['gender'] = df['gender'].map({'Female': 'female', 'Male': 'male'})
    df['edu'] = df['edu'].map({"Bachelor's degree": 'Undergraduate degree',
                               'Pursuing masters degree': 'Postgraduate degree',
                               "Master's degree": 'Postgraduate degree',
                               'Associate degree': '12th'})
    df['edu_status'] = df['edu_status'].fillna('Studying')
    df['edu_status'] = df['edu_status'].map(
        {'No': 'Studying', 'Maybe': 'Studying', 'Yes': 'Have a job'})
    df.to_csv('dataset.csv', index=False)


def entry_from_example():
    df = pd.read_csv('dataset.csv')

    for i in range(len(df)):
        data = df.iloc[i]
        testing(fname=str(data['fname']),
                lname=str(data['lname']),
                age=str(data['age']),
                gender=str(data['gender']),
                edu=str(data['edu']),
                edu_status=str(data['edu_status']))


def entry_random(freq: int = 10, clear_db: bool = False):
    if clear_db:
        driver.get('http://localhost:81/project1/testing/delete_db.php')
        time.sleep(1)

    for i in range(freq):
        uname = ''
        fname = f'f{i}'
        lname = f'p{i}'
        for j in range(random.randint(high=7, low=5)):
            uname += random.choice(list(string.ascii_letters))
        for l in range(4):
            fname += random.choice(list(string.ascii_letters))
            lname += random.choice(list(string.ascii_letters))

        print(f'loop:{i}, clear db: {clear_db}')
        testing(fname=fname,
                lname=lname,
                age=random.randint(high=50, low=10),
                gender=random.choice(['male', 'female']),
                edu=random.choice(
                    ['10th', '12th', 'Undergraduate degree', 'Postgraduate degree']),
                edu_status=random.choice(['Have a job', 'Studying']),
                mail=f"{uname}@{random.choice(['gmail', 'outlook', 'yahoo'])}.com")


def single_entry():
    uname = ''
    for j in range(random.randint(high=7, low=5)):
        uname += random.choice(list(string.ascii_letters))
    testing(fname='fname',
            lname='lname',
            age=random.randint(high=50, low=10),
            gender=random.choice(['male', 'female']),
            edu=random.choice(
                ['10th', '12th', 'Undergraduate degree', 'Postgraduate degree']),
            edu_status=random.choice(['Have a job', 'Studying']),
            mail=f"{uname}@{random.choice(['gmail', 'outlook', 'yahoo'])}.com")


single_entry()
