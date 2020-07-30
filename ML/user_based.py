#print(" Recomendaciones")
############################################# METODO USER_BASED ##############################################################
import pandas as pd
import numpy as np
from sklearn.metrics import mean_squared_error
from sklearn.model_selection import train_test_split
from sklearn.neighbors import NearestNeighbors
import matplotlib.pyplot as plt
import sklearn

#############DATASETS###

df_users=pd.read_csv("users.csv")
#print(df_users.shape)
df_repos=pd.read_csv("repos.csv")
#print(df_repos.shape)
df_ratings=pd.read_csv("ratings.csv")
#print(df_ratings.shape)

###Cuantas ciudades y usuarios tenemos
n_users = df_ratings.userId.unique().shape[0]
n_items = df_ratings.repoId.unique().shape[0]
#print(str(n_users) + ' users')
#print(str(n_items) + ' items')

##Valoraciones
plt.hist(df_ratings.rating, bins=5)

###Exactas
df_ratings.groupby(["rating"])["userId"].count()
#print(a)
plt.hist(df_ratings.groupby(["repoId"])["repoId"].count(),bins=5)
###############Metodo User-Based#########
##Creamos la matriz
df_matrix = pd.pivot_table(df_ratings,values='rating',index='userId',columns='repoId').fillna(0)
#print(df_matrix)

###Sparsity
ratings = df_matrix.values
sparsity = float(len(ratings.nonzero()[0]))
sparsity /= (ratings.shape[0] * ratings.shape[1])
sparsity *=100
#print('Sparsity: {:4.2f}%'.format(sparsity))

####Dividimos en train y test
#para luego medir la calidad de nuestra recomendacion
ratings_train, ratings_test = train_test_split(ratings, test_size = 0.2, random_state=42)
#print(ratings_test.shape)
#print(ratings_train.shape)

######MATRIZ DE SIMILITUD--> Distancias por coseno 
sim_matrix = 1-sklearn.metrics.pairwise.cosine_distances(ratings)
#print(sim_matrix.shape)

##Grafica similitud entre los usuarios mientras sea mas cercano a 1 mayor similitud
#plt.imshow(sim_matrix)
#plt.colorbar()
#plt.show()

###Predicciones o Sugeridos para Ti
sim_matrix_train = sim_matrix[0:8,0:8]
sim_matrix_test = sim_matrix[8:10,8:10]
users_predictions = sim_matrix_train.dot(ratings_train) / np.array([np.abs(sim_matrix_train).sum(axis=1)]).T
#print(users_predictions)

##Grafica de las recomendaciones
plt.rcParams['figure.figsize'] = (20.0, 5.0)
plt.imshow(users_predictions);
plt.colorbar()
plt.show()

##Debe existir  en el dataset de train
import sys 
USUARIO_EJEMPLO=sys.argv[1]
data = df_users[df_users['name'] == USUARIO_EJEMPLO]
usuario_ver = data.iloc[0]['userId'] - 1
user0=users_predictions.argsort()[usuario_ver]

##Prediccion con mayor puntaje (3) de la predicion

for i,aRepo in enumerate(user0[-3:]):
  selRepo=df_repos[df_repos['repoId']==(aRepo+1)]
  selRepo=selRepo['title'].values
  for ciu in selRepo:
	    print(ciu)#,'puntaje:',users_predictions[usuario_ver][aRepo]))
'''
###EL ERROR MEDIR###
def get_mse(preds, actuals):
	if preds.shape[1] != actuals.shape[1]:
		actuals = actuals.T
		preds = preds[actuals.nonzero()].flatten()
		actuals = actuals[actuals.nonzero()].flatten()
		return mean_squared_error(preds, actuals)
    
###VALOR##
#print(get_mse(users_predictions, ratings_train))
#PRediccion para el test set
users_predictions_test = sim_matrix_test.dot(ratings) / np.array(
    [np.abs(sim_matrix_test).sum(axis=1)]).T
users_predictions_test=users_predictions_test
#print("predictions: ",users_predictions_test.shape)
#print("test: ",ratings_test.shape)
from sklearn.metrics import mean_squared_error
mse = mean_squared_error(ratings_test, users_predictions_test)
#print("mse: ",mse)
'''