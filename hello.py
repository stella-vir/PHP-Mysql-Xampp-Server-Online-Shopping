# export FLASK_APP=hello
# export FLASK_ENV=development
# flask run --host=0.0.0.0

from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
@app.route('/hello/')
@app.route('/hello/<name>')
def hello_world(name=None):
    # return '<h1Hello world</h1>'
    return render_template('hello.html', name=name)
