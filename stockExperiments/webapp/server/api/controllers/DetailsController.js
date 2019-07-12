const axios = require('axios');

class DetailsController {
  async getEarningsCalendar(req, res, next) {
    const url = 'https://stocksearning.com/LoadData.asmx/GetEarningsCalendar';
    const appHeaders = {
      "accept":"application/json, text/javascript, */*; q=0.01",
      "accept-language":"en-US,en;q=0.9","cache-control":"no-cache",
      "content-type":"application/json; charset=UTF-8",
      "pragma":"no-cache",
      "x-requested-with":"XMLHttpRequest",
    };

    const data = {EarningDate:"2019-07-11",strBasicMarketCap:"ALL", Slider1_Max:"0", Slider1_Min:"7", Slider2_Max:"0", Slider2_Min:"5", Slider3_Max:"0", Slider3_Min:"11"};
    const response = await axios.post(
      url,
      data,
      {
        headers: appHeaders,
      },
      { withCredentials: true },
    );

    console.log('--- response ---', response.data);
    // make ajax request to above url with above params
    return res.send({ data: response.data });
  }
}

module.exports = DetailsController;
