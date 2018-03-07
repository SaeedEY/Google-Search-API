# Google-Search-API
This Api Providing an Easy Service to Search on Google and Using search results.
<hr>
<h3>What's the Point</h3>
Just Use it to find out the Goals.
<hr>
<h3>How to Use :</h3>
<ol>
<li>make a specific folder/subdomain on your site</li>
<li>upload both <b>lib.php</b> and <b>index.php</b> files into that folder/subdomain you'v createn</li>
<li>get your own google api keys from <a href='https://developers.google.com/custom-search/json-api/v1/introduction'>developers.google.com/custom-search/json-api/v1/introduction</a> (it has limit number of <i>search/day</i>)</li>
<li>use this api just by passing the values by HTTP-GET/HTTP-POST</li>
</ol>
<hr>
<h3>Notes</h3>
Google Search Apis unfortunately has limit of searching per day .<br>
<h3>Usage Examples :</h3>
https://YOURDOMAIN.TLD/API_FOLDER/?key=[GOOGLE_SEARCH_API_HERE]&q=[SEARCH_KEY]<br>
https://SUBDOMAIN.YOURDOMAIN.TLD/?key=[GOOGLE_SEARCH_API_HERE]&q=[SEARCH_KEY]<br>
https://SUBDOMAIN.YOURDOMAIN.TLD/?key=[GOOGLE_SEARCH_API_HERE]&q=[SEARCH_KEY]&next (For Showing next page result)<br>
https://YOURDOMAIN.TLD/API_FOLDER/?key=[GOOGLE_SEARCH_API_HERE]&q=[SEARCH_KEY]&next (For Showing next page result)<br>
<h3>Return Results :</h3>
All the Returning Results are in <b>JSON</b> datatype.<br>
for each item it has 3 part : 1.<i>Title of Search</i> , 2.<i>Description of Search</i> , 3.<i>Link of the Page you Looking For</i><br>
