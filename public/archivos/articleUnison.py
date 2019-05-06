import pandas as pd
import nltk
import matplotlib.pyplot as plt
from nltk import word_tokenize
from nltk.tokenize import RegexpTokenizer
from collections import Counter
from wordcloud import WordCloud

df = pd.read_csv("noticias.csv")

text = " ".join(article for article in df['text'])


tokenizer = RegexpTokenizer(r'\w+')
tokens = tokenizer.tokenize(text)

for i in range(len(tokens)):
    tokens[i] = tokens[i].lower()

print('finished tokenizing')
new_list = []

stopWords = set(nltk.corpus.stopwords.words("spanish"))
for word in tokens:
    if word not in stopWords:
        new_list.append(word)


print('finished depurating stopwords')
counter = Counter(new_list)

#words_df = pd.DataFrame(list(counter.most_common(20)), orient='index').reset_index()
words_df = pd.DataFrame(list(counter.most_common(50)))
#words_df[0].plot()
# words_df[0].plot()


#words_df.set_index(0, inplace=True)
#words_df[1].plot()

print('starting text2')
text2 = " ".join(word for word in words_df[0])

wordcloud = WordCloud().generate(text2)
plt.imshow(wordcloud, interpolation='bilinear')
plt.axis("off")
plt.show()

