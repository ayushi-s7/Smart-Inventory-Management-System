from flask import Flask, render_template, request, jsonify
import joblib

app = Flask(__name__)
model = joblib.load('product_forecast.joblib')

@app.route('/')
def index():
    return render_template('first_page.html')

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data=request.get_json()
        # print("Received data:", data)  
        input_values=data['inputValues']
        if len(input_values)%3!=0:
            raise ValueError("Invalid number of features. Expected multiple of 3 features for row-wise prediction.")
        input_values_reshaped=[input_values[i:i+3] for i in range(0,len(input_values), 3)]

        predictions=[model.predict([row]).tolist()[0] for row in input_values_reshaped]
        return jsonify(predictions=predictions)

    except Exception as e:
        return jsonify(error=str(e))

if __name__ == '__main__':
    app.run(debug=True)
